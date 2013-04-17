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
<xsl:template match="/">
    <div>
	<xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute>
	<form action="#">
      <table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
        <tr>
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>Edit Profile Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
        </tr>
        <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
          <td colspan="2"><table width="100%" cellspacing="5" cellpadding="0">
		  	  <tr>
			  	<td>
					Successfully edit profile.
				</td>
			  </tr>
			  <tr>
			  	<td></td>
			  </tr>
				<tr>
					<td><a href='#'>
					  <xsl:attribute name="onClick">showEditProfile(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />, <xsl:value-of select="//uid" />)</xsl:attribute>
					   edit profile</a>, Edit the detail profile of your account</td>
				</tr>
				<tr>
					<td><a href='#'>
					  <xsl:attribute name="onClick">showUserManagement(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />)</xsl:attribute>
					   user maintenance</a>, Add, edit, or delete the profile of other account</td>
				</tr>
				<tr>
					<td>
					<a href='#'>
					  <xsl:attribute name="onClick">logout(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />)</xsl:attribute>
					   logout </a>, Logout from the current user
					</td>
				</tr>
            </table></td>
        </tr>
        <tr></tr>
      </table></form>

    </div>
  </xsl:template>
</xsl:stylesheet>
