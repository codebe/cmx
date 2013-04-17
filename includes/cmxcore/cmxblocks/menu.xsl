<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="data.xml" --><!DOCTYPE xsl:stylesheet  [
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
<xsl:output method="html" encoding="iso-8859-1" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:template match="/">
	<!-- List Menu Templates -->
	<ul>
		<xsl:for-each select="//Module">
			<li><a href="#">
			<xsl:attribute name="onClick"><xsl:value-of select="directory" />()</xsl:attribute>
			<xsl:value-of select="displayname" />
			</a></li>
		</xsl:for-each>
	</ul>	
</xsl:template>

</xsl:stylesheet>



