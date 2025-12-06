function wa_link($number, $text = '')
{
    $number = preg_replace('/[^0-9]/', '', $number);
    return 'https://wa.me/' . $number . '?text=' . urlencode($text);
}