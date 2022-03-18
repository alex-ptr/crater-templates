<footer>
    <script type="text/php">
        /**
         * DOMPDF API
         * 
         * @DOCS : https://github.com/dompdf/dompdf/wiki/Usage
         * @REMINDER: set enable_php to true in config/dompdf.php, and keep "<script type="text/php">" instead of blade @php tag to evaluate php at build time
        */
        if ( isset($pdf) ) {
            $page_width = $pdf->get_width();
            $page_height = $pdf->get_height();
            $margin = 15;

            // Styles
            $color = array(0,0,0);
            $size = 8;  // pt
            $font = $fontMetrics->getFont("DejaVu Sans");
            $font_bold = $fontMetrics->getFont("DejaVu Sans", "regular");
            $thickness = .5; //pt

            // Calcule la taille 
            $dummy_text = "0/0";
            $text_width = $fontMetrics->getTextWidth($dummy_text, $font, $size);
            $text_height = $fontMetrics->getFontHeight($font, $size);
            
            // Position from the top left of the document in PT
            $x_right = $page_width - $text_width - $margin;
            $x_left = $margin;
            
            $y = $page_height - $text_height - $margin;

            // Generate a line 
            $pdf->line($margin, $y, $page_width - $margin, $y, $color, $thickness);

            // generated text written to every page after rendering
            $pdf->page_text(
                $x_right, 
                $y, 
                "{PAGE_NUM}/{PAGE_COUNT}", 
                $font, 
                $size, 
                $color
            );
            $pdf->page_text(
                $x_left, 
                $y, 
                "SIRET : 50011559700022 - APE : 9003B/6202B - TVA : FR79500115597", 
                $font, 
                $size, 
                $color
            );
        }
    </script>

</footer>