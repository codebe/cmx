<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="data.xml" -->
<!DOCTYPE xsl:stylesheet  [
	<!ENTITY nbsp   "&#160;">
	<!ENTITY copy   "&#169;">
	<!ENTITY reg    "&#174;">
	<!ENTITY trade  "&#8482;">
	<!ENTITY mdash  "&#8212;">
	<!ENTITY ldquo  "&#8220;">
	<!ENTITY rdquo  "&#8221;"> 
	<!ENTITY pound  "&#163;">
	<!ENTITY yen    "&#165;">
	<!ENTITY euro   "&#8364;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="iso-8859-1" />
<xsl:template match="/"><div><xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute>
	<table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
	  <tr>
		  <td class="handler" id="main_content_handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Home Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
	  </tr>
	  <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
	  	<td colspan="2"><xsl:value-of select="//content" disable-output-escaping="yes" /></td>
	  </tr>
	  <tr></tr>
	</table></div>
</xsl:template>
</xsl:stylesheet>