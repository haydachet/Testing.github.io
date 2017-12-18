## 2007-08-15 mailform pro Ver.1.0 functions file

$about = 'メールフォームの関数用ファイル';
sub envMailform {
	$form{'pv'} = $getCookieData{"pv"};
	flock(FH, LOCK_EX);
		open(FH,$config{"conversion_file"});
			$form{'unique'} = <FH>;
		close(FH);
	flock(FH, LOCK_NB);
	$form{'conversion_rate'} = $form{'conversion_count'} / $form{'unique'} * 100;
	$form{'conversion_rate'} = round($form{'conversion_rate'}, 3) . '%';
	
	$form{'conversion_count'} = $form{'conversion_count'} . " conversions";
	$form{'unique'} = $form{'unique'} . " users";
	$form{'pv'} = $form{'pv'} . " pageviews";
	$form{'input_time'} = $form{'input_time'} . " sec";
	
	for($cnt=0;$cnt<@mailformENV;$cnt++){
		$envs .= "\[ " . $mailformENVname[$cnt] . " \] " . $form{$mailformENV[$cnt]} . "\n";
		push @field, $mailformENVname[$cnt];
		push @csv, $form{$mailformENV[$cnt]};
		$config{"return_body"} =~ s/<${mailformENV[$cnt]}>/$form{$mailformENV[$cnt]}/g;
		$config{"posted_body"} =~ s/<${mailformENV[$cnt]}>/$form{$mailformENV[$cnt]}/g;
	}
}

sub serials {
	if(-f $config{"serial_file"}){
		flock(FH, LOCK_EX);
			open(FH,$config{"serial_file"});
				$serial = <FH>;
			close(FH);
		flock(FH, LOCK_NB);
		$form{'conversion_count'} = $serial;
		$serial_number = sprintf("%04d",$serial);
		$form{"serial"} = $serial_number;
		$config{"subject"} = "\[" . $serial_number . "\] " . $config{"subject"};
		if($config{"return_subject_serial"}){
			$config{"return_subject"} = "\[" . $serial_number . "\] " . $config{"return_subject"};
		}
		$serial++;
		flock(FH, LOCK_EX);
			open(FH,">".$config{"serial_file"});
				print FH $serial;
			close(FH);
		flock(FH, LOCK_NB);
	}
}

sub domaincheck {
	if(index($ENV{'HTTP_REFERER'},$config{"domain"}) > -1 && $config{"domain"} != 0){
		$error{"code"} = 1;
		$error{"info"} .= "指定ドメイン以外から送信されようとしています。<br>\n";
	}
}
sub confcheck {
	if(@mailto < 1 || $config{"thanks_url"} eq $null){
		$error{"code"} = 2;
		$error{"info"} .= "コンフィグが正しく設定されていません。<br>\n";
	}
}
sub spamcheck {
	if($config{"english_spam"}){
		$error{"code"} = 3;
		$error{"info"} .= "全ての入力内容が英文で記述されております。<br>\n";
	}
	if($config{"link_spam_count"} && !($config{"link_spam"})){
		$error{"code"} = 4;
		$error{"info"} .= "入力された内容に\[\/URL\]が含まれています。<br>\n";
	}
}
sub getpost {
	if ($ENV{'REQUEST_METHOD'} eq "POST") {
		read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
	}
	else {
		$buffer = $ENV{'QUERY_STRING'};
	}
	Jcode::convert(\$buffer,'utf8');
	@pairs = split(/&/, $buffer);
	foreach $pair (@pairs) {
		($name, $value) = split(/=/, $pair);
		$name =~ tr/+/ /;
		$name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		$value =~ tr/+/ /;
		$value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
		Jcode::convert(\$name,'utf8');
		Jcode::convert(\$value,'utf8');
		if($name ne $null && $name ne "Submit" && $name ne "confirm_email" && $name ne "x" && $name ne "y" && $name ne "must_id" && $name ne "input_time"){
			if($name ne $prevName){
				$value =~ s/\r\n/\r/ig;
				$value =~ s/\r/\n/ig;
				$value =~ s/\n//ig;
				$value =~ s/\,//ig;
				$resbody .= "\n\[ ${name} \] ${value} ";
				$config{"body"} .= "\n\[ ${name} \] ${value} ";
				push @field, $name;
				push @csv, $value;
				$config{"return_body"} =~ s/<${name}>/$value/g;
				$config{"posted_body"} =~ s/<${name}>/$value/g;
			}
			else{
				$resbody .= " ${value} ";
				$config{"body"} .= " ${value} ";
				$csv[-1] .= " ${value}";
			}
			if(!($value !~ /[\x80-\xff]/)){
				$config{"english_spam"} = 0;
			}
			if($value =~ /\[\/url\]/si && !($config{"link_spam"})){
				$config{"link_spam_count"} = 1;
			}
			$prevName = $name;
		}
		$form{$name} = $value;
	}
	Jcode::convert(\$resbody,'utf8');
}

sub logfileCreate {
	if($config{"log_file"} ne $null && $config{"password"} ne $null){
		if(-f $config{"log_file"}){
			chmod 0777, $config{"log_file"};
			push @csv,"\"\n";
			my($put_field) = "\"" . join("\",\"",@csv);
			Jcode::convert(\$put_field,'sjis');
			flock(FH, LOCK_EX);
				open(FH,">>".$config{"log_file"});
					print FH $put_field;
				close(FH);
			flock(FH, LOCK_NB);
			chmod 0600, $config{"log_file"};
		}
		else{
			push @csv,"\"\n";
			push @field,"\"\n";
			my($put_field) = "\"" . join("\",\"",@field);
			$put_field .= "\"".  join("\",\"",@csv);
			Jcode::convert(\$put_field,'sjis');
			flock(FH, LOCK_EX);
				open(FH,">".$config{"log_file"});
					print FH $put_field;
				close(FH);
			flock(FH, LOCK_NB);
			chmod 0600, $config{"log_file"};
		}
	}
}

sub downloadScreen {
	print "Content-type: text/html\n\n";
	print "<html>\n";
	print "\t<head>\n";
	print "\t\t<title>mode::logfile download</title>\n";
	print "\t\t<style type=\"text/css\">\n";
	print "\t\t<!--\n";
	print "\t\t* {\n";
	print "\t\t\tfont-family: \"Arial\", \"Helvetica\", \"sans-serif\";font-size: 12px;\n";
	print "\t\t}\n";
	print "\t\t-->\n";
	print "\t\t</style>\n";
	print "\t</head>\n";
	print "\t<body>\n";
	print "\t\t<h1 style=\"font-size: 21px;color: #232323;\">mode::logfile download</h1>\n";
	print "\t\t<form name=\"getLogs\" action=\"\" method=\"POST\">\n";
	print "\t\t\tPASSWORD <input type=\"password\" name=\"password\" style=\"ime-mode: disabled;width: 300px;\"><input type=\"submit\" value=\"GET LOG FILE\">\n";
	print "\t\t</form>$form{'password'}</body></html>\n";
}

sub deleteScreen {
	print "Content-type: text/html\n\n";
	print "<html>\n";
	print "\t<head>\n";
	print "\t\t<title>mode::logfile delete</title>\n";
	print "\t\t<style type=\"text/css\">\n";
	print "\t\t<!--\n";
	print "\t\t* {\n";
	print "\t\t\tfont-family: \"Arial\", \"Helvetica\", \"sans-serif\";font-size: 12px;\n";
	print "\t\t}\n";
	print "\t\t-->\n";
	print "\t\t</style>\n";
	print "\t</head>\n";
	print "\t<body>\n";
	print "\t\t<h1 style=\"font-size: 21px;color: #232323;\">mode::logfile delete</h1>\n";
	print "\t\t<form name=\"getLogs\" action=\"\" method=\"POST\">\n";
	print "\t\t\tPASSWORD <input type=\"password\" name=\"password\" style=\"ime-mode: disabled;width: 300px;\"><input type=\"submit\" value=\"DELETE LOG FILE\">\n";
	print "\t\t</form>$form{'password'}</body></html>\n";
}

sub deleteComplate {
	unlink $config{"log_file"};
	print "Content-type: text/html\n\n";
	print "<html>\n";
	print "\t<head>\n";
	print "\t\t<title>mode::logfile delete Complate</title>\n";
	print "\t\t<style type=\"text/css\">\n";
	print "\t\t<!--\n";
	print "\t\t* {\n";
	print "\t\t\tfont-family: \"Arial\", \"Helvetica\", \"sans-serif\";font-size: 12px;\n";
	print "\t\t}\n";
	print "\t\t-->\n";
	print "\t\t</style>\n";
	print "\t</head>\n";
	print "\t<body>\n";
	print "\t\t<h1 style=\"font-size: 21px;color: #232323;\">logfile delete complate</h1>\n";
	print "\t\t</body></html>\n";
}

sub fileDownload {
	chmod 0777, $config{"log_file"};
	print "Content-type: application/octet-stream; name=\"${log_file}\"\n";
	print "Content-Disposition: attachment; filename=\"${download_file_name}\"\n\n";
	open(IN,$config{"log_file"});
	print <IN>;
	chmod 0600, $config{"log_file"};
}

sub refresh {
	my($refreshurl) = @_;
	print "Content-type: text/html\n\n";
	print "<html>\n";
	print "\t<head>\n";
	print "\t\t<title>sending...</title>\n";
	print "\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Shift_JIS\">\n";
	print "\t\t<meta http-equiv=\"refresh\" content=\"0;URL=${refreshurl}\">\n";
	print "\t</head>\n";
	print "\t<body></body>\n";
	print "</html>\n";
}

sub sendmail {
	my($mailto,$mailfrom,$subject,$body) = @_;
	my($sendmail) = $config{"sendmail"};
	if($config{"mode"}){
		open(MAIL,"| $sendmail -f $mailfrom -t");
			print MAIL "To: $mailto\n";
			print MAIL "Errors-To: $mailto\n";
			print MAIL "From: $mailfrom\n";
			print MAIL "Subject: $subject\n";
			print MAIL "MIME-Version:1.0\n";
			print MAIL "Content-type:text/plain; charset=ISO-2022-JP\n";
			print MAIL "Content-Transfer-Encoding:7bit\n";
			print MAIL "X-Mailer:SYNCK GRAPHICA MAILFORM\n\n";
			print MAIL "$body\n";
		close(MAIL);
	}
	else{
		flock(FH, LOCK_EX);
			open(FH,">${mailto}\.eml");
				print FH "To: $mailto\n";
				print FH "Errors-To: $mailto\n";
				print FH "From: $mailfrom\n";
				print FH "Subject: $subject\n";
				print FH "MIME-Version:1.0\n";
				print FH "Content-type:text/plain; charset=ISO-2022-JP\n";
				print FH "Content-Transfer-Encoding:7bit\n";
				print FH "X-Mailer:SYNCK GRAPHICA MAILFORM\n\n";
				print FH "$body\n";
			close(FH);
		flock(FH, LOCK_NB);
	}
}
sub GetCookie {
	my($cookie) = $ENV{'HTTP_COOKIE'};
	my(@cookie) = split(/\&/,$cookie);
	my(@cookies) = ();
	for(my($cnt)=0;$cnt<@cookie;$cnt++){
		my($name, $value) = split(/=/,$cookie[$cnt]);
		$cookies{$name} = $value;
	}
	return *cookies;
}
sub round {
	my ($num, $decimals) = @_;
	my ($format, $magic);
	$format = '%.' . $decimals . 'f';
	$magic = ($num > 0) ? 0.5 : -0.5;
	sprintf($format, int(($num * (10 ** $decimals)) + $magic) / (10 ** $decimals));
}
sub debuglog {
	my ($print) = @_;
	flock(FH, LOCK_EX);
		open(FH,">>debug.txt");
			print FH $print;
		close(FH);
	flock(FH, LOCK_NB);
}
