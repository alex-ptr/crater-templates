<style text="text/css">
    footer{
        position:absolute;
        height:1cm;
        bottom:0.5cm;
        left:0.5cm;
        right:0.5cm;
        background-color: aquamarine;
        border-top:1px solid #000;
    }
    /* TEMP ----------------------- */

</style>

<footer>
    @php

        // DOMPDF API
        // https://github.com/dompdf/dompdf/wiki/Usage
        
        if ( isset($pdf) ) {
            $page_width = $pdf->get_width();
            $page_height = $pdf->get_height();
            
            // Styles
            $color = array(0,0,0);
            $size = 6;  // pt
            $font = $fontMetrics->getFont("DejaVu Sans");
            $font_bold = $fontMetrics->getFont("DejaVu Sans", "regular");
            $thickness = 1; //pt

            // Calcule la taille 
            $dummy_text = "0/0";
            $text_width = $fontMetrics->getTextWidth($dummy_text, $font, $size);
            $text_height = $fontMetrics->getFontHeight($font, $size);
            
            // Position from the top left of the document in PT
            $x = ($page_width - $text_width) / 2;
            $y = 785; // 785pt ≃ 27.7 cm
            //$y = $page_height - 2 * $text_height - 24;

            // Generate a line 
            $pdf->line(16, $y, $w - 32, $y, $color, $thickness);

            // generated text written to every page after rendering
            $pdf->page_text($x, $y, "{PAGE_NUM}/{PAGE_COUNT}", $font, $size, $color);
        }

    @endphp
</footer>