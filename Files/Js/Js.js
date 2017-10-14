		$(function() {
			$("#ColarLista").click(function() {
				$('#ImportarLista').removeClass('ui-state-active');
				$('#BaixarLista').removeClass('ui-state-active');
				$(this).addClass('ui-state-active');
				
				$('#ButtonArquivoLimpar').css('display', 'none');
				$('#carousel-wrapper').css('display', 'block');
				$('#ButtonDownload').css('display', 'none');
				$('#ButtonAnexar').css('display', 'block').removeClass('ButtonOff').addClass('ButtonOff');
				$('#ButtonUpload').css('display', 'none');
				$('#NameFile').css('display', 'none');
				$('.StatusSuccess').css('display', 'none');
				$('.StatusFalha').css('display', 'none');
			});
			$("#ImportarLista").click(function() {
				$('#ColarLista').removeClass('ui-state-active');
				$('#BaixarLista').removeClass('ui-state-active');
				$(this).addClass('ui-state-active');
				
				$('#ButtonArquivoLimpar').css('display', 'block');
				$('#carousel-wrapper').css('display', 'none');
				$('#ButtonDownload').css('display', 'none');
				$('#ButtonAnexar').css('display', 'none').removeClass('ButtonOff').addClass('ButtonOff');
				$('#ButtonUpload').css('display', 'none');
				$('#NameFile').css('display', 'none');
				$('.StatusSuccess').css('display', 'none');
				$('.StatusFalha').css('display', 'none');
			});
			$("#BaixarLista").click(function() {
				$('#ColarLista').removeClass('ui-state-active');
				$('#ImportarLista').removeClass('ui-state-active');
				$(this).addClass('ui-state-active');
				
				$('#ButtonArquivoLimpar').css('display', 'none');
				$('#carousel-wrapper').css('display', 'none');
				$('#ButtonDownload').css('display', 'block');
				$('#ButtonAnexar').css('display', 'none').removeClass('ButtonOff').addClass('ButtonOff');
				$('#ButtonUpload').css('display', 'none');
				$('#NameFile').css('display', 'none');
				$('.StatusSuccess').css('display', 'none');
				$('.StatusFalha').css('display', 'none');
			});
			$("#ButtonDownload").click(function() {
				window.open('http://linkstring.comxa.com/Trackers/Trackers/Download.php');
			});
			$('#AreaColar').bind("click", function() {
				if (($('#AreaColar').val() != '')&&($('#AreaColar').val() != 'Cole seus Trackers aqui!')) { 
					$('#ButtonAnexar').removeClass('ButtonOff');
				} else {
					$('#ButtonAnexar').addClass('ButtonOff');
				}
					
			});
			$("#ButtonAnexar").click(function() {
				
				if($('#ButtonAnexar').hasClass('ButtonOff')) {
				} else {
					trackers = $('#AreaColar').val();
					trackers = trackers.replace(/(^|\r\n|\n)([^*]|$)/g, "$1\r\n$2");

					$.ajax({
						method: "POST",
						url: "http://linkstring.comxa.com/Trackers/Trackers/Attachment.php",
						data: {
							NewsTrackers: trackers
						}
					})
					.done(function(DataReturn) {
						
						document.getElementById('AreaColar').value = '';
						if(DataReturn == '<p>Ok!</p>'){
							$('.StatusSuccess').css('display', 'block');
							$('.StatusFalha').css('display', 'none');
						} else {
							$('.StatusSuccess').css('display', 'none');
							$('.StatusFalha').css('display', 'block');
						}
					});
				}
			});
			$("#BotaoArquivo").click(function() {
				$("#InputFile")[0].click();
					
				$('#InputFile').change(function () {
					var FileName = $( this ).val().split("\\").pop();
					$("#NameFile").html(FileName);
					$('#ButtonUpload').css('display', 'block');
					$('#NameFile').css('display', 'block');
				});
					
			});
			$("#ButtonLimpar").click(function() {
				$('#ButtonUpload').css('display', 'none');
				$('#NameFile').css('display', 'none');
				$('.StatusSuccess').css('display', 'none');
				$('.StatusFalha').css('display', 'none');
					
			});
			$("#ButtonUpload").click(function() {
				$("#InputSubmit")[0].click();
			});
				
		});