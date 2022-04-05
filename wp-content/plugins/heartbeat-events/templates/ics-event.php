BEGIN:VCALENDAR
PRODID:-//<?php print $data->site_name . "\r\n"; ?> //NONSGML Events //EN
VERSION:2.0
METHOD:PUBLISH
X-MS-OLK-FORCEINSPECTOROPEN:TRUE
BEGIN:VTIMEZONE
TZID:<?php print $data->timezone . "\r\n"; ?>
BEGIN:STANDARD
DTSTART:16010101T000000
TZOFFSETFROM:<?php print $data->offset . "\r\n"; ?>
TZOFFSETTO:<?php print $data->offset . "\r\n"; ?>
END:STANDARD
END:VTIMEZONE
BEGIN:VEVENT
CLASS:PUBLIC
CREATED:<?php print $data->created_date . "\r\n"; ?>
DESCRIPTION:<?php print $data->stripped_content; ?>
DTEND;TZID="<?php print $data->timezone; ?>":<?php print $data->end_date . "\r\n"; ?>
DTSTAMP:<?php print $data->created_date . "\r\n"; ?>
DTSTART;TZID="<?php print $data->timezone; ?>":<?php print $data->start_date . "\r\n"; ?>
LAST-MODIFIED:<?php print $data->modified_date . "\r\n"; ?>
LOCATION:<?php print $data->venue . "\r\n"; ?>
PRIORITY:5
SEQUENCE:0
SUMMARY;LANGUAGE=en-sg:<?php print $data->title . "\r\n"; ?>
TRANSP:TRANSPARENT
UID:<?php print $data->uid . "\r\n"; ?>
X-ALT-DESC;FMTTYPE=text/html:<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//E
	N">\n<HTML>\n<HEAD>\n<META NAME="Generator" CONTENT="MS Exchange Server ve
	rsion rmj.rmm.rup.rpr">\n<TITLE></TITLE>\n</HEAD>\n<BODY>\n<!-- Converted 
	from text/rtf format -->\n\n<?php print $data->content; ?></BODY>\n</HTML>
X-MICROSOFT-CDO-BUSYSTATUS:BUSY
X-MICROSOFT-CDO-IMPORTANCE:1
X-MICROSOFT-DISALLOW-COUNTER:FALSE
X-MS-OLK-AUTOFILLLOCATION:FALSE
X-MS-OLK-AUTOSTARTCHECK:FALSE
X-MS-OLK-CONFTYPE:0
END:VEVENT
END:VCALENDAR
