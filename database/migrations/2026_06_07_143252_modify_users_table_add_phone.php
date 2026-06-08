<?php

use Illuminate\Database\Migrations\Migration;

// Phone column is already included in the create_users_table migration.
// This migration is intentionally left empty.
return new class extends Migration
{
    public function up(): void {}
    public function down(): void {}
};
