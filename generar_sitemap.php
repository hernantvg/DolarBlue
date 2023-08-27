<?php
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Página principal
echo '<url>';
echo '<loc>https://cotizaciondolarblue.com</loc>';
echo '<lastmod>' . date("Y-m-d") . '</lastmod>';
echo '<changefreq>hourly</changefreq>';
echo '<priority>1.0</priority>';
echo '</url>';

// Otras páginas...
// ...

echo '</urlset>';
?>
