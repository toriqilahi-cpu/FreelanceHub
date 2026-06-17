<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('freelancer_profiles', function (Blueprint $table) {

            if (!Schema::hasColumn('freelancer_profiles', 'location')) {
                $table->string('location')->nullable()->after('photo');
            }

            if (!Schema::hasColumn('freelancer_profiles', 'experience_year')) {
                $table->integer('experience_year')->nullable();
            }

            if (!Schema::hasColumn('freelancer_profiles', 'education')) {
                $table->string('education')->nullable();
            }

            if (!Schema::hasColumn('freelancer_profiles', 'portfolio_url')) {
                $table->string('portfolio_url')->nullable();
            }

            if (!Schema::hasColumn('freelancer_profiles', 'github_url')) {
                $table->string('github_url')->nullable();
            }

            if (!Schema::hasColumn('freelancer_profiles', 'linkedin_url')) {
                $table->string('linkedin_url')->nullable();
            }

            if (!Schema::hasColumn('freelancer_profiles', 'availability')) {
                $table->string('availability')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('freelancer_profiles', function (Blueprint $table) {

            $table->dropColumn([
                'location',
                'experience_year',
                'education',
                'portfolio_url',
                'github_url',
                'linkedin_url',
                'availability'
            ]);
        });
    }
};