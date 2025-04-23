<?php

use App\Models\Tenant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // For path-based routing
            $table->string('tenant_code')->unique();
            $table->string('domain')->nullable()->unique(); // For future subdomain support
            $table->json('database')->nullable(); // For future separate DB support
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        $tenant = Tenant::create([
            'name' => 'Acme Corp',
            'slug' => 'acme',
            'is_active' => true,
            // For separate DB:
            'database' => [
                'database' => 'acme_corp',
                'username' => 'acme_user',
                'password' => 'secure_password',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
