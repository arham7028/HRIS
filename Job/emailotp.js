function sendOTP() {
	const email = document.getElementById('email');
	const otpverify = document.getElementsByClassName('otpverify')[0];

	let otp_val = Math.floor(Math.random() * 10000);

	let emailbody = `<h2>Your OTP is </h2>${otp_val}`;
	Email.send({
    SecureToken : "5ea87299-13d2-49eb-94e0-5afd21cec296",
    To : email.value,
    From : "rohitwankhade376@gmail.com",
    Subject : "Email Verification",
    Body : emailbody,
}).then(

	message => {
		if (message === "OK") {
			alert("OTP sent to your email " + email.value);

			otpverify.style.display = "flex";
			const otp_inp = document.getElementById('otp_inp');
			const otp_btn = document.getElementById('otp-btn');

			otp_btn.addEventListener('click', () => {
				if (otp_inp.value == otp_val) {
					// alert("Email address verified...");
					// let divhid = document.getElementById('hid').innerHTML=;
					// let divunhid = document.getElementById('hid').innerHTML=;
					console.log('success');
					console.log(email.value);
				}
				else {
					alert("Invalid OTP");
				}
			})
		}
	}
);
}