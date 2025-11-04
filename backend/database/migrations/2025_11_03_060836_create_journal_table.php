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
        Schema::create('journal', function (Blueprint $table) {
            $table->smallInteger('type')->default(0);
            $table->integer('trans_no')->default(0);
            $table->date('tran_date')->nullable();
            $table->string('reference', 60)->default('');
            $table->string('source_ref', 60)->default('');
            $table->date('event_date')->nullable();
            $table->date('doc_date')->default(now());
            $table->char('currency', 10)->default('');
            $table->double('amount')->default(0);
            $table->double('rate')->default(1);
            $table->timestamps();

            $table->primary(['type', 'trans_no']);

            $table->foreign('currency')->references('currency_abbreviation')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal');
    }
};
