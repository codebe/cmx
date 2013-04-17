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
	<xsl:attribute name="id"> <xsl:value-of select="//blockID" /></xsl:attribute><form action="#">
      <table width="100%" class="tableHandler" cellpadding="0" cellspacing="1">
        <tr>			
		  <td class="handler" align="right" width="100%">
		  <xsl:attribute name="id"><xsl:value-of select="//blockID" />_handler</xsl:attribute>
		   <em>User Edit Profile Page <xsl:value-of select="//blockID" /></em> &nbsp;</td>
		  <td class="closer" align="right"><a href="#">
		  <xsl:attribute name="onClick">closeWindow(<xsl:value-of select="//blockID" />);</xsl:attribute>
		  &nbsp;x&nbsp; </a> </td>
        </tr>
        <tr><xsl:attribute name="id"><xsl:value-of select="//blockID" />_section</xsl:attribute>
          <td colspan="2">
			  <table width="100%" cellspacing="5" cellpadding="0">
				  <tr>
					<td width="100" align="right">Full Name</td>
					<td>:</td>
					<td><input name="name" type="text" id="name" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//name" /></xsl:attribute>
					</input>
					&nbsp;<span style="color:#FF0000">*</span></td>
				  </tr>
				  <tr>
					<td align="right">Username</td>
					<td>:</td>
					<td><input name="uname" type="text" id="uname" size="25" disabled="disabled">
					<xsl:attribute name="value"><xsl:value-of select="//uname" /></xsl:attribute>
					</input>
					&nbsp;<span style="color:#FF0000">*</span></td>
				  </tr>
				  <tr>
					<td align="right">New Password</td>
					<td>:</td>
					<td><input name="pass" type="password" id="pass" size="20" />
					&nbsp;<span style="color:#FF0000">*</span></td>
				  </tr>
				  <tr>
					<td align="right">Email</td>
					<td>:</td>
					<td><input name="email" text="text" id="email" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//email" /></xsl:attribute>
					</input>
					&nbsp;<span style="color:#FF0000">*</span></td>
				  </tr>
				  <tr>
					<td align="right">Forward Email</td>
					<td>:</td>
					<td><input name="femail" text="text" id="femail" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//femail" /></xsl:attribute>
					</input>
					</td>
				  </tr>
				  <tr>
					<td align="right">URL</td>
					<td>:</td>
					<td><input name="url" text="text" id="url" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//url" /></xsl:attribute>
					</input>
					</td>
				  </tr>
				  <tr>
					<td align="right">Yahoo ID</td>
					<td>:</td>
					<td><input name="yim" text="text" id="yim" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//user_yim" /></xsl:attribute>
					</input>
					</td>
				  </tr>
				  <tr>
					<td align="right">ICQ</td>
					<td>:</td>
					<td><input name="icq" text="text" id="icq" size="25">
					<xsl:attribute name="value"><xsl:value-of select="//user_icq" /></xsl:attribute>
					</input>
					</td>
				  </tr>
				  <tr>
					<td align="right" valign="top">Signature</td>
					<td valign="top">:</td>
					<td><textarea name="sig" id="sig" cols="24" rows="5">
					<xsl:value-of select="//user_sig" />
					</textarea></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input name="reset" type="reset" value="Reset" /> &nbsp; 
						<input name="submit" type="button" id="submit" value="Submit">
							<xsl:attribute name="onClick">editUserProfile(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
						</input></td>
				  </tr>
				  <tr>
						<td colspan="3"><hr size="1" width="100%" /></td>
					</tr>
				  <xsl:if test="//userMode!='User'">
				  <tr>
					<td colspan="3"><a href='#'>
						  <xsl:attribute name="onClick">showUserManagement(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
						   user maintenance</a>, Add, edit, or delete the profile of other account</td>
				  </tr>
				  </xsl:if>
				  <tr>
					<td colspan="3">
						<a href='#'>
						  <xsl:attribute name="onClick">logout(<xsl:value-of select="//blockID" />, <xsl:value-of select="//userID" />)</xsl:attribute>
						   logout </a>, Logout from the current user
						</td>
					</tr>
				</table>
		  </td>
        </tr>
        <tr></tr>
      </table></form>
    </div>
  </xsl:template>
</xsl:stylesheet>