<?xml version="1.0" encoding="iso-8859-1"?>
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
      <table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
        <tr>			
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>User Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
        </tr>
        <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
          <td colspan="2">
		  <xsl:choose>
		  	<xsl:when test="//uid!=0">
				<table width="100%" cellspacing="5" cellpadding="0">
					<tr> 
						<td width="100">Name</td><td width="10">:</td><td><xsl:value-of select="//name" /></td>
					</tr>
					<tr>
						<td>Email</td><td>:</td><td><xsl:value-of select="//email" /></td>
					</tr>
					<tr>
						<td>User Mode</td><td>:</td><td><xsl:value-of select="//umode" /></td>
					</tr>
					<tr>
						<td colspan="3"><hr size="1" width="100%" /></td>
					</tr>
					<tr>
						<td colspan="3"><a href='#'>
						  <xsl:attribute name="onClick">showEditProfile(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />, <xsl:value-of select="//uid" />)</xsl:attribute>
						   edit profile</a>, Edit the detail profile of your account</td>
					</tr>
					<xsl:if test="//umode!='User'">
					<tr>
						<td colspan="3"><a href='#'>
						  <xsl:attribute name="onClick">showUserManagement(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />)</xsl:attribute>
						   user maintenance</a>, Add, edit, or delete the profile of other account</td>
					</tr>
					</xsl:if>
					<tr>
						<td colspan="3">
						<a href='#'>
						  <xsl:attribute name="onClick">logout(<xsl:value-of select="//blockID" />, <xsl:value-of select="//uid" />)</xsl:attribute>
						   logout </a>, Logout from the current user
						</td>
					</tr>
				</table>
			</xsl:when>
			<xsl:otherwise>
				<table width="100%" cellspacing="5" cellpadding="0">
					<tr>
						<td>Your username or password is invalid or your account is deactivated. <br /> Back to login page ?<a href='#'>
						  <xsl:attribute name="onClick">showLoginPage(<xsl:value-of select="//blockID" />)</xsl:attribute>
						   to login page </a></td>
					</tr>
				</table>
			</xsl:otherwise>
		  </xsl:choose>
		  </td>
        </tr>
        <tr></tr>
      </table>
    </div>
  </xsl:template>    
</xsl:stylesheet>


