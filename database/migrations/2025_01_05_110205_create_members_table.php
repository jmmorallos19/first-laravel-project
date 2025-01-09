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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->integer('skill');
            $table->string('bio');
            $table->timestamps();

            //foreignId() - use to make a relation between two db table
            //constrained() - use to make sure that the two db table has a maintain relationship
            /*onDelete('cascade') - When the parents(departments - in this scenario) record is deleted
              the child(members - in this scenario) record also deleted */
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
