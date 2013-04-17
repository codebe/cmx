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
	<form action="#" enctype="multipart/form-data" target="_blank">
	<table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
	  <tr>
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Modules Management <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
	  </tr>
	  <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
	  	<td colspan="2"><table width="100%" cellspacing="5" cellpadding="0">
              <tr>
			  	<th>No</th>
                <th>Name </th>
				<th>Type</th>
                <th>Description </th>
                <th>Status </th>
                <th>Action</th>
              </tr>             
			  <xsl:for-each select="//Modules">
			  <tr>
			  	<td><xsl:number count="Modules" format="01" value="position()"/></td>
				<td><xsl:value-of select="name" /></td>
				<td><xsl:value-of select="type" /></td>
				<td><xsl:value-of select="description" /></td>
				<td>
				<xsl:choose>
					<xsl:when test="activated='1'">
						active
					</xsl:when>
					<xsl:otherwise>
						deactive
					</xsl:otherwise>
				</xsl:choose>
				</td>
				<td>
				<xsl:choose>
					<xsl:when test="type='features'">
						-
					</xsl:when>
					<xsl:otherwise>
						<xsl:if test="activated='1'">
						<a href="#"><xsl:attribute name="onClick">deactivatingModule(<xsl:value-of select="id"/>, <xsl:value-of select="//blockID" />)</xsl:attribute>deactivating</a>,						
						</xsl:if>
						
						<xsl:if test="activated='0'">
						<a href="#"><xsl:attribute name="onClick">activatingModule(<xsl:value-of select="id"/>, <xsl:value-of select="//blockID" />)</xsl:attribute>activating</a>,
						</xsl:if>
						
						<a href="#"><xsl:attribute name="onClick">deleteModule(<xsl:value-of select="id"/>, <xsl:value-of select="//blockID" />)</xsl:attribute>delete</a>
					</xsl:otherwise>
				</xsl:choose>
				</td>
			  </tr>
			  </xsl:for-each>
			  <tr><td colspan="5">Install modules ?<a href='#'> 
			  <xsl:attribute name="onClick">showInstallPage(<xsl:value-of select="//blockID" />)</xsl:attribute>
			  Installation page </a> </td>
              </tr>
            </table></td>
	  </tr>
	  <tr></tr>
	</table></form></div>
</xsl:template>
</xsl:stylesheet>