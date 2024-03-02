<?php

use App\Enums\PropertyTypesEnum;
use App\Enums\PorpertyStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->unique();
            $table->timestamps();
            $table->float('price')->required();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_type',[
                PropertyTypesEnum::SINGLE->value,
                PropertyTypesEnum::TOWNHOUSE->value,
                PropertyTypesEnum::MULTIFAMILY->value,
                PropertyTypesEnum::BUNGALOW->value,
            ]);
            $table->enum('status',[
                PorpertyStatusEnum::SOLD->value,
                PorpertyStatusEnum::SALE->value,
                PorpertyStatusEnum::HOLD->value,
            ])->required();
            $table->foreign('property_id')->references('id')->on('properties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_descriptions');
    }
};