<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use OpenApi\Attributes as OA;

class ReportController extends Controller
{
    #[OA\Post(
        path: '/api/reports',
        summary: 'Buat laporan baru',
        tags: ['Laporan'],
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'multipart/form-data',
                schema: new OA\Schema(
                    required: ['title', 'category_id', 'region', 'location', 'description'],
                    properties: [
                        new OA\Property(property: 'title', type: 'string', example: 'Jalan Rusak di RT 05'),
                        new OA\Property(property: 'category_id', type: 'integer', example: 1),
                        new OA\Property(property: 'region', type: 'string', example: 'Kec. Ciledug, Kota Tangerang'),
                        new OA\Property(property: 'location', type: 'string', example: 'Jl. Mawar No. 10'),
                        new OA\Property(property: 'description', type: 'string', example: 'Jalan berlubang cukup dalam dan membahayakan pengendara'),
                        new OA\Property(property: 'evidence_photo', type: 'string', format: 'binary', description: 'Foto bukti (jpg/png, maks 2MB)'),
                    ]
                )
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Laporan berhasil dibuat',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'message', type: 'string', example: 'Laporan berhasil dibuat'),
                        new OA\Property(property: 'data', ref: '#/components/schemas/ReportResource'),
                    ]
                )
            ),
            new OA\Response(response: 422, description: 'Validasi gagal'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'          => 'required|string|max:255',
            'category_id'    => 'required|exists:categories,id',
            'region'         => 'required|string|max:255',
            'location'       => 'required|string|max:255',
            'description'    => 'required|string',
            'evidence_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $defaultStatus = Status::where('status_name', 'Menunggu Verifikasi')->firstOrFail();

        $photoPath = null;
        if ($request->hasFile('evidence_photo')) {
            $photoPath = $request->file('evidence_photo')->store('reports', 'public');
        }

        $report = Report::create([
            'user_id'        => auth('api')->id(),
            'category_id'    => $request->category_id,
            'status_id'      => $defaultStatus->id,
            'title'          => $request->title,
            'region'         => $request->region,
            'location'       => $request->location,
            'description'    => $request->description,
            'evidence_photo' => $photoPath,
        ]);

        $report->load(['user:id,name', 'category:id,category_name', 'status:id,status_name']);

        return response()->json([
            'status'  => 'success',
            'message' => 'Laporan berhasil dibuat',
            'data'    => $this->formatReport($report),
        ], 201);
    }

    #[OA\Get(
        path: '/api/reports',
        summary: 'Daftar semua laporan',
        tags: ['Laporan'],
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Daftar laporan berhasil diambil',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'data', type: 'array', items: new OA\Items(ref: '#/components/schemas/ReportResource')),
                    ]
                )
            ),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function index()
    {
        $reports = Report::with(['user:id,name', 'category:id,category_name', 'status:id,status_name'])
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $reports->map(fn($r) => $this->formatReport($r)),
        ]);
    }

    #[OA\Get(
        path: '/api/reports/{id}',
        summary: 'Detail laporan berdasarkan ID',
        tags: ['Laporan'],
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Detail laporan',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'data', ref: '#/components/schemas/ReportResource'),
                    ]
                )
            ),
            new OA\Response(response: 404, description: 'Laporan tidak ditemukan'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function show($id)
    {
        $report = Report::with(['user:id,name', 'category:id,category_name', 'status:id,status_name'])->find($id);

        if (!$report) {
            return response()->json(['status' => 'error', 'message' => 'Laporan tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $this->formatReport($report),
        ]);
    }

    #[OA\Delete(
        path: '/api/reports/{id}',
        summary: 'Hapus laporan milik sendiri',
        tags: ['Laporan'],
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Laporan berhasil dihapus',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'status', type: 'string', example: 'success'),
                        new OA\Property(property: 'message', type: 'string', example: 'Laporan berhasil dihapus'),
                    ]
                )
            ),
            new OA\Response(response: 403, description: 'Tidak diizinkan menghapus laporan milik orang lain'),
            new OA\Response(response: 404, description: 'Laporan tidak ditemukan'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ]
    )]
    public function destroy($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['status' => 'error', 'message' => 'Laporan tidak ditemukan'], 404);
        }

        if ($report->user_id !== auth('api')->id()) {
            return response()->json(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk menghapus laporan ini'], 403);
        }

        if ($report->evidence_photo) {
            Storage::disk('public')->delete($report->evidence_photo);
        }

        $report->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Laporan berhasil dihapus',
        ]);
    }

    private function formatReport(Report $report): array
    {
        return [
            'id'             => $report->id,
            'title'          => $report->title,
            'region'         => $report->region,
            'location'       => $report->location,
            'description'    => $report->description,
            'evidence_photo' => $report->evidence_photo
                ? asset('storage/' . $report->evidence_photo)
                : null,
            'user'       => $report->user,
            'category'   => $report->category,
            'status'     => $report->status,
            'created_at' => $report->created_at,
            'updated_at' => $report->updated_at,
        ];
    }
}
