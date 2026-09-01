<?php

namespace App\Support;

use App\Models\SiteSetting;

class OrderMode
{
    public static function isWhatsapp(): bool
    {
        return SiteSetting::getValue('order_mode', 'checkout') === 'whatsapp';
    }

    public static function isCheckout(): bool
    {
        return ! self::isWhatsapp();
    }

    public static function whatsappNumber(): ?string
    {
        $number = SiteSetting::getValue('whatsapp_number');
        if (! $number) return null;
        $digits = preg_replace('/\D+/', '', $number);
        return $digits !== '' ? $digits : null;
    }

    public static function waLink(string $message): ?string
    {
        $number = self::whatsappNumber();
        if (! $number) return null;
        return 'https://wa.me/' . $number . '?text=' . rawurlencode($message);
    }

    public static function productMessage($product, int $qty = 1): string
    {
        $ref = $product->sku ?? $product->slug;
        $msg = "Hello Bank Seized Cars, I'm interested in this vehicle:\n\n"
            . "- Vehicle: {$product->name}\n"
            . "- Reference: {$ref}\n"
            . "- Price: $" . number_format((float) $product->price, 2) . "\n";
        if ($product->down_payment) {
            $msg .= "- Down Payment: $" . number_format((float) $product->down_payment, 2) . "\n";
        }
        $msg .= "\nIs this vehicle still available? I'd like to schedule a viewing.";
        return $msg;
    }

    public static function cartMessage($cartItems, float $total): string
    {
        $text = "Hello Bank Seized Cars, I'm interested in the following vehicles:\n\n";
        $totalDp = 0;
        foreach ($cartItems as $item) {
            $dp = $item['down_payment'] ?? null;
            $text .= "- {$item['name']}\n";
            $text .= "  Price: $" . number_format((float) $item['price'], 2) . "\n";
            if ($dp) {
                $text .= "  Down Payment: $" . number_format((float) $dp, 2) . "\n";
                $totalDp += (float) $dp;
            }
            $text .= "\n";
        }
        $text .= "Total Price: $" . number_format($total, 2) . "\n";
        if ($totalDp > 0) {
            $text .= "Total Down Payment: $" . number_format($totalDp, 2) . "\n";
        }
        $text .= "\nAre these vehicles still available? I'd like to schedule viewings.";
        return $text;
    }
}
