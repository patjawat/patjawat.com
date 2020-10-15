import React, { useState,useEffect } from "react";
import { useRouter } from 'next/router'
import Navigation from './navigation'


export default function MyLayout({ children }) {
  return (
    <>
<Navigation />
<div className="container mt-5">
          {children}
</div>
    </>
  )
}

