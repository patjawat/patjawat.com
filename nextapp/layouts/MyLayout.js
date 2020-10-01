import React, { useState,useEffect } from "react";
import { useRouter } from 'next/router'
import Header from './header'
export default function MyLayout({ children }) {
  return (
    <>

<Header />
          {children}

    </>
  )
}