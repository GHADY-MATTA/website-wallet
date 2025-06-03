# 💳 Website Wallet - A Full-Stack Digital Wallet Platform

A fully functional and secure **Digital Wallet Platform** built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**. This project showcases a professional-grade web application that includes financial services like deposits, withdrawals, identity verification, peer-to-peer payments, and more, all backed by a robust backend API and dynamic frontend interface.

---

## 🌟 Features

| Feature                  | Description                                              |
| ------------------------ | -------------------------------------------------------- |
| ✉️ Account Creation      | Register via email, phone number, or social logins       |
| 📅 Identity Verification | Upload ID documents for automatic or manual verification |
| 👤 Profile Management    | View/update name, address, contact info                  |
| ⚠️ Account Limits        | Daily/weekly/monthly transaction limits by user tier     |
| 💸 Deposit/Withdrawal    | Secure wallet loading and withdrawal to bank or card     |
| 🚚 P2P Transfers         | Internal wallet-to-wallet transfers                      |
| ⏰ Scheduled Payments     | One-time or recurring payment scheduling                 |
| ⬛ QR Payments            | Generate/scan QR codes for in-store transactions         |
| 📢 Notifications         | Real-time alerts for all wallet activities               |
| 📊 Transaction History   | Filterable & exportable statements                       |
| ✉️ Self-Service Tools    | Password reset, profile updates, card controls           |
| ⚖️ Public API            | Developer-friendly documentation for integrations        |
| 💬 Help Center           | FAQs, tutorials, and onboarding guides                   |
| 📩 Support System        | Live chat and ticketing for customer support             |
| 🔍 System Logs           | Admin logging for audit and monitoring                   |
| 📊 Analytics Dashboard   | User, transaction, and growth metrics                    |
| 📅 Reports               | Export custom reports (CSV, PDF)                         |
| 📥 Backups               | Automated, encrypted database backups                    |

---

## 🧰 Tech Stack

* **Frontend**: HTML, CSS, JavaScript, jQuery, Axios
* **Backend**: PHP (OOP), RESTful APIs
* **Database**: MySQL (usersignupWallet)
* **External APIs**: Gemini API, MailComposer, jQuery CDN

---

## 📁 Hosting & Access

| Type            | URL                                                                |
| --------------- | ------------------------------------------------------------------ |
| **Local**       | `http://localhost/website-wallet/client/assets/homepage.html`      |
| **External**    | `https://5255ghady5255.ip-ddns.com/`                               |
| **Public IP**   | `35.180.75.140`                                                    |
| **GitHub Repo** | [GitHub Repository](https://github.com/GHADY-MATTA/website-wallet) |

---

## 📊 Component Diagram

```mermaid
graph TD
    A[Frontend (HTML/CSS/JS)] -->|Axios, jQuery| B[PHP API Layer]
    B --> C[MySQL Database]
    B --> D[Gemini API]
    B --> E[MailComposer SMTP]
    B --> F[Transaction APIs]
    B --> G[P2P Transactions API]
```

---
[Screenshot](/image.png)
[Screenshot](/website-wallet/wallet-Diagram.drawio.png)
## 🔧 API Documentation

### Database Connection

```php
// connection.php
class Database {
    public function getConnection() {
        // returns PDO connection
    }
}
```

### TransactionSearchAPI

```php
searchTransactions($keyword):
// Searches 'transactions' table for keyword match
// Outputs results in HTML table or "No results found."
```

### P2PTransactionAPI

```php
searchTransactions($keyword):
// Searches 'p2p_transactions' table
// Outputs matching records in a scrollable table
```

---

## 📢 How to Use

1. **Clone the Project**

   ```bash
   git clone https://github.com/GHADY-MATTA/website-wallet
   cd website-wallet
   ```
2. **Setup Localhost (XAMPP/WAMP)**

   * Import the SQL file into MySQL.
   * Update DB credentials in `connection.php`.
3. **Test APIs** via browser or tools like Postman.
4. **Try Demo URLs** above for hosted version.

---

## 🤝 Contribution

Pull requests are welcome! Please open issues for feature requests or bug reports.

---

## 📄 License

MIT License

---

## 👨‍💼 Author

Developed by **Ghady Matta**
Passionate about secure fintech and modern web systems.
