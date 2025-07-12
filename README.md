# offline-booking
This is an offline based service USSD app designed to offer **accessible bookings for consultancy, events, parking, and travel** — built for environments with limited internet access. booking integrated with MPESA payment

## Project structure

/ussd-app
│
├── .env
├── vendor/                # Composer packages
├── index.php              # Main USSD script
├── mpesa.php              # STK push logic
├── db.php                 # DB connection
└── utils.php              # Shared functions


## 🚀 Features

- 📞 USSD Navigation Menu with session control
- 💳 M-Pesa STK Push integration using Safaricom Daraja API
- 🗄️ Secure payment logging via MySQL (PDO)
- 🔐 `.env` secrets management with `phpdotenv`
- ✅ Modular and extensible codebase for future services


## 🧑‍💻 Requirements

- PHP >= 7.4
- Composer
- MySQL
- Valid M-Pesa Shortcode and Passkey
- Accessible Callback URL
- Safaricom Developer Account (Daraja API)

