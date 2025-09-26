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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
             $table->string('supplier_name');
            $table->string('supplier_short_name')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('website')->nullable();
            $table->string('supplier_currency')->nullable();
            $table->string('tax_group')->nullable();
            $table->string('our_customer_no')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->decimal('credit_limit', 15, 2)->nullable();
            $table->string('payment_terms')->nullable();
            $table->boolean('prices_include_tax')->default(false);
            $table->string('accounts_payable')->nullable();
            $table->string('purchase_account')->nullable();
            $table->string('purchase_discount_account')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('document_language')->nullable();
            $table->text('mailing_address')->nullable();
            $table->text('physical_address')->nullable();
            $table->text('general_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
