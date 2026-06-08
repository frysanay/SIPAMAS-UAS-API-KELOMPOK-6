<?php

namespace App\Http\Controllers;

use App\Models\Report;
use OpenApi\Attributes as OA;

class MyReportController extends Controller
{
    #[OA\Get(
        path: '/api/my-reports',
        summary: 'Daftar laporan milik pengguna yang sedang login',
        tags: ['Histori Laporan'],
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
        $reports = Report::with(['category:id,category_name', 'status:id,status_name'])
            ->where('user_id', auth('api')->id())
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $reports->map(fn($r) => $this->formatReport($r)),
        ]);
    }

    #[OA\Get(
        path: '/api/my-reports/{id}',
        summary: 'Detail laporan milik sendiri berdasarkan ID',
        tags: ['Histori Laporan'],
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
        $report = Report::with(['category:id,category_name', 'status:id,status_name'])
            ->where('user_id', auth('api')->id())
            ->find($id);

        if (!$report) {
            return response()->json(['status' => 'error', 'message' => 'Laporan tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $this->formatReport($report),
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
            'category'   => $report->category,
            'status'     => $report->status,
            'created_at' => $report->created_at,
            'updated_at' => $report->updated_at,
        ];
    }
}
