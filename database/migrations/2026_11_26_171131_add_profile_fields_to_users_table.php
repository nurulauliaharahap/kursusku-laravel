<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('institution')->nullable();
            $table->text('address')->nullable();

            $table->string('role')->default('user');
            $table->string('status')->default('active');

            $table->timestamp('last_login_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'position',
                'institution',
                'address',
                'role',
                'status',
                'last_login_at',
            ]);
        });
    }
};