<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/tariff">
		<html>
			<head>
				<title>Samsung Galaxy S5 - 24 Months</title>
				<link rel="stylesheet" href="../style.css" type="text/css"/>
			</head>
			<body>
				<h1>Samsung Galaxy S5</h1>
				<h2>All plans represent a 24 month contract.</h2>
				<div class="table">
					<table>
							<tr>
								<th style="background-color: #ffffff"></th>
								<th class="vodafone">Vodafone</th>
								<th class="ee">EE</th>
								<th class="o2">O2</th>
								<th class="three">Three</th>
							</tr>
						<xsl:for-each select="category">
							<tr>
								<td class="set"><xsl:value-of select="set"/></td>
								<td><xsl:value-of select="vodafone"/></td>
								<td><xsl:value-of select="ee"/></td>
								<td><xsl:value-of select="o2"/></td>
								<td><xsl:value-of select="three"/></td>
							</tr>
						</xsl:for-each>
					</table>
					</div>
					<div class="back">
						<a href="../index.php">take me back</a>
					</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>