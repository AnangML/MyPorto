<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Profile Settings (Singleton record for portfolio owner)
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('headline_id');
            $table->string('headline_en');
            $table->text('bio_id');
            $table->text('bio_en');
            $table->string('location')->nullable();
            $table->string('email_public')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('cv_file_path')->nullable();
            $table->boolean('availability_status')->default(true);
            $table->string('seo_title_id')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_id')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->jsonb('meta')->nullable();
            $table->timestamps();
        });

        // 2. Project Categories
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_id');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 3. Technologies
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('icon_key')->nullable();
            $table->string('website_url')->nullable();
            $table->timestamps();
        });

        // 4. Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_id');
            $table->string('title_en');
            $table->string('summary_id', 300);
            $table->string('summary_en', 300);
            $table->text('description_id');
            $table->text('description_en');
            $table->string('role_id')->nullable();
            $table->string('role_en')->nullable();
            $table->string('client_name')->nullable();
            $table->string('project_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->string('status')->default('draft'); // draft, published, archived
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->date('started_at')->nullable();
            $table->date('completed_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title_id')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_id')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->jsonb('meta')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at']);
            $table->index(['is_featured', 'sort_order']);
        });

        // 5. Pivot: project_category
        Schema::create('project_category', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->primary(['project_id', 'project_category_id']);
        });

        // 6. Pivot: project_technology
        Schema::create('project_technology', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->primary(['project_id', 'technology_id']);
        });

        // 7. Skills
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // backend, frontend, database, tools, other
            $table->string('description_id')->nullable();
            $table->string('description_en')->nullable();
            $table->string('proficiency_label_id')->nullable();
            $table->string('proficiency_label_en')->nullable();
            $table->string('icon_key')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->index(['is_visible', 'sort_order']);
            $table->index('category');
        });

        // 8. Experiences
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('organization');
            $table->string('position_id');
            $table->string('position_en');
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable(); // Full-time, Internship, Freelance, Education
            $table->date('started_at');
            $table->date('ended_at')->nullable();
            $table->boolean('is_current')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->index(['is_visible', 'sort_order']);
        });

        // 9. Certificates
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('issuer');
            $table->string('credential_id')->nullable();
            $table->string('credential_url')->nullable();
            $table->date('issued_at')->nullable();
            $table->date('expires_at')->nullable();
            $table->string('file_path')->nullable();
            $table->string('image_path')->nullable();
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->index(['is_visible', 'sort_order']);
        });

        // 10. Post Categories
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_id');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 11. Posts (Blog)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_id');
            $table->string('title_en');
            $table->text('excerpt_id')->nullable();
            $table->text('excerpt_en')->nullable();
            $table->longText('content_id');
            $table->longText('content_en');
            $table->string('cover_image_path')->nullable();
            $table->string('status')->default('draft'); // draft, published, archived
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title_id')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_id')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at']);
        });

        // 12. Pivot: post_category
        Schema::create('post_category', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post_category_id')->constrained()->cascadeOnDelete();
            $table->primary(['post_id', 'post_category_id']);
        });

        // 13. Contact Messages
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status')->default('new'); // new, read, replied, archived
            $table->string('ip_hash')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('post_category');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('project_technology');
        Schema::dropIfExists('project_category');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('technologies');
        Schema::dropIfExists('project_categories');
        Schema::dropIfExists('profile_settings');
    }
};
