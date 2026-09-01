<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('year')->nullable()->after('brand');
            $table->string('mileage')->nullable()->after('year');
            $table->string('transmission')->nullable()->after('mileage');
            $table->string('fuel_type')->nullable()->after('transmission');
            $table->string('vin')->nullable()->after('fuel_type');
            $table->string('exterior_color')->nullable()->after('vin');
            $table->string('interior_color')->nullable()->after('exterior_color');
            $table->string('engine_size')->nullable()->after('interior_color');
            $table->string('drivetrain')->nullable()->after('engine_size');
            $table->text('condition_note')->nullable()->after('drivetrain');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['year', 'mileage', 'transmission', 'fuel_type', 'vin', 'exterior_color', 'interior_color', 'engine_size', 'drivetrain', 'condition_note']);
        });
    }
};
