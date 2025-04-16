<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:sm="http://www.sitemaps.org/schemas/sitemap/0.9"
    exclude-result-prefixes="sm">

  <xsl:output method="html" indent="yes"/>

  <!-- Match the root using our declared namespace prefix -->
  <xsl:template match="/">
    <html>
      <head>
        <meta charset="UTF-8" />
        <title>Sitemap</title>
        <style type="text/css">
          body {
            font-family: Arial, sans-serif;
            margin: 20px;
          }
          table {
            border-collapse: collapse;
            width: 100%;
          }
          th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
          }
          a {
            color: #0066cc;
            text-decoration: none;
          }
          a:hover {
            text-decoration: underline;
          }
        </style>
      </head>
      <body>
        <h1>Sitemap</h1>
        <table>
          <tr>
            <th>URL</th>
            <th>Last Modified</th>
          </tr>
          <!-- Iterate over each <url> element, prefixing it with 'sm:' -->
          <xsl:for-each select="sm:urlset/sm:url">
            <tr>
              <td>
                <a href="{sm:loc}">
                  <xsl:value-of select="sm:loc"/>
                </a>
              </td>
              <td>
                <xsl:value-of select="sm:lastmod"/>
              </td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>