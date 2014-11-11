<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/Data">
    <html>
        <body>
            <table border="1">
                <tr>
                    <th>Game Title</th>
                    <th>Platform</th>
                    <th>Release Date</th>
                    <th>Rating</th>
                    <th>Publisher</th>
                </tr>
            <xsl:for-each select="Game">
                <tr>
                <xsl:value-of select="GameTitle" />
                <xsl:value-of select="Platform"/>
                <xsl:value-of select="ReleaseDate"/>
                <xsl:value-of select="Overview/ERSB"/>
                <xsl:value-of select="Publisher"/>
                <xsl:value-of select="Developer"/>
                </tr>
            </xsl:for-each>
            </table>
        </body>
    </html>
    </xsl:template>
 </xsl:stylesheet>