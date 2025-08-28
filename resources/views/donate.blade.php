<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate-AKMS</title>
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      text-align: center;
      background-color: #f4f4f4;
    }

    header {
      background-color: #005f73;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap; /* Ensures items wrap on smaller screens */
    }

    header h1 {
      margin: 0;
      font-size: 1.2rem;
      text-align: center;
      flex: 1; /* Makes the title flexible and center-aligned */
    }

    .back-home-btn {
      background-color: #eef2f3;
      color: #005f73;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 5px;
      font-size: 0.9rem;
      transition: background-color 0.3s ease, color 0.3s ease;
      margin-top: 10px;
    }

    .back-home-btn:hover {
      background-color: #005f73;
      color: white;
    }

    /* Donate Container */
    .donate-container {
      padding: 20px;
      margin: 20px auto;
      width: 90%; /* Default for smaller screens */
      max-width: 600px; /* Restricts width on larger screens */
      background: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 15px;
    }

    .donate-container h1 {
      color: #005f73;
      margin-bottom: 10px;
      font-size: 1.5rem;
    }

    .donate-container p {
      font-size: 1rem;
      margin: 10px 0;
    }

    /* QR Code */
    .qr-code img {
      max-width: 100%; /* Ensures the image is responsive */
      height: auto;
      margin: 20px 0;
    }

    /* Bank Details */
    .bank-details {
      background: #eef2f3;
      padding: 15px;
      border-radius: 5px;
      margin-top: 10px;
      font-size: 0.95rem;
      text-align: left; /* Align content to the left for better readability */
    }

    .bank-details img {
      max-width: 100px; /* Resizes logo for all screen sizes */
      height: auto;
      display: block;
      margin: 0 auto 10px; /* Centers the logo */
    }

    footer {
      margin-top: 20px;
      padding: 10px;
      background-color: #005f73;
      color: white;
      font-size: 0.85rem;
    }

    /* Media Queries */
    @media (max-width: 768px) {
      header {
        flex-direction: column; /* Stacks the header content on small screens */
        text-align: center;
      }

      .back-home-btn {
        font-size: 0.8rem;
        padding: 6px 12px;
      }

      .donate-container {
        width: 95%;
      }

      .donate-container h1 {
        font-size: 1.3rem;
      }

      .bank-details {
        font-size: 0.9rem;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1rem;
      }

      .back-home-btn {
        font-size: 0.75rem;
        padding: 5px 10px;
      }

      .donate-container h1 {
        font-size: 1.2rem;
      }

      .bank-details {
        font-size: 0.85rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <header>
    <h1>Menyumbang Kepada Masjid Al-Irsyad</h1>
    <a href="{{ route('welcome') }}" class="back-home-btn">
      <i class="bi bi-box-arrow-left"></i> Kembali ke Halaman Utama
    </a>
  </header>

  <!-- Donate Section -->
  <div class="donate-container">
    <h1>Sumbangan Anda Sangatlah Dihargai!</h1>
    <p>Sokong aktiviti dan operasi Masjid Al-Irsyad dengan menderma menggunakan butiran di bawah.</p>

    <!-- QR Code Image -->
    <div class="qr-code">
      <img src="{{ asset('images/MosqueQR.jpg') }}" alt="QR Code for Donation">
    </div>

    <!-- Bank Details -->
    <div class="bank-details">
      <img src="{{ asset('images/Bank-islam logo.jpeg') }}" alt="Bank Islam Logo">
      <h2>Bank Details</h2>
      <p><strong>Bank Name:</strong> Bank Islam</p>
      <p><strong>Account Name:</strong> Masjid Al-Irsyad</p>
      <p><strong>Account Number:</strong> 02105010008808</p>
    </div>
  </div>

  <!-- Footer Section -->
  <footer>
    <p>&copy; 2025 AKMS v1.0. All rights reserved</p>
  </footer>
</body>
</html>
