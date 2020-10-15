import React, { Component } from 'react'
import Document, { Html, Head, Main, NextScript } from 'next/document'
// แก้ไข Html แบบกำหนดเอง
class MyDocument extends Document {
    static async getInitialProps(ctx) {
      const initialProps = await Document.getInitialProps(ctx)
      return { ...initialProps }
    }
    render() {
      return (
        <Html>
          <Head />
          <link rel="stylesheet" href="libs/css/bootstrap.css" />
          <link rel="stylesheet" href="libs/css/slick.css" />
          <link rel="stylesheet" href="libs/css/ripple.css" />
          <link rel="stylesheet" href="libs/css/roundslider.css" />
          <link rel="stylesheet" href="libs/css/magnific-popup.css" />
          <link rel="stylesheet" href="libs/css/aos.css" />
          <link rel="stylesheet" href="libs/css/fontawesome.css" />
          <link rel="stylesheet" href="libs/css/style.css" />
        <body className="hide-scroll header-1" data-spy="scroll" data-target="#top-nav" data-offset="100">
    
            <Main />
            <NextScript />
            
              <script src="libs/js/jquery-3.2.1.min.js"></script>
            <script src="libs/js/popper.min.js"></script>
            <script src="libs/js/bootstrap.min.js"></script>
            <script src="libs/js/slick.min.js"></script>
            <script src="libs/js/ripple.min.js"></script>
            <script src="libs/js/roundslider.js"></script>
            <script src="libs/js/aos.js"></script>
            <script src="libs/js/jquery.magnific-popup.min.js"></script>
            <script src="libs/js/main.js"></script>
          </body>
        </Html>
      )
    }
  }
  
  export default MyDocument