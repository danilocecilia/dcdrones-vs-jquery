var ajax = {
		isSubmiting: false,
		send: function () {

			if (ajax.isSubmiting == false) {
				ajax.isSubmiting = true;

				var userName = $("input[name=name] ").val();
				var userEmail = $("input[name=email] ").val();
				var userComments = $("textarea ").val();

				if (userName == "" || userEmail == "" || userComments == "")
					alert("Por favor preencher todos os campos.");
				else {
					ajax.SetText("Enviando... ");
					$.post("mail.php ", {
						name: userName, email: userEmail, comments: userComments
					}, function (data) {
						if (data == "true ") {
							ajax.SetText("Enviado! ");
						} else {
							ajax.SetText("Enviar Email");
							alert(data);
						}

						ajax.isSubmiting = false;
					});
				}
			}
			else alert("Você pode enviar somente 1 email por vez. ");
		},
		SetText: function (text) {
			$("input[type=button] ").val(text);
		}
	}