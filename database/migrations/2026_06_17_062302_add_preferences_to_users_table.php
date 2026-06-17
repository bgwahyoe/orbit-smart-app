<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable();
            }

            if (!Schema::hasColumn('users', 'notif_email')) {
                $table->boolean('notif_email')->default(false);
            }

            if (!Schema::hasColumn('users', 'dark_mode')) {
                $table->boolean('dark_mode')->default(false);
            }

            if (!Schema::hasColumn('users', 'reminder_tugas')) {
                $table->boolean('reminder_tugas')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $columns = [];

            foreach ([
                'bio',
                'notif_email',
                'dark_mode',
                'reminder_tugas'
            ] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $columns[] = $column;
                }
            }

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};