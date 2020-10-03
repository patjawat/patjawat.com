import React, { useState,useEffect } from "react";
import { useRouter } from 'next/router'
import { useQuery, useMutation } from "@apollo/react-hooks";
import { gql } from "apollo-boost";

import Header from './navigation'

const GET_SETTINGS = gql`
  query {
    generalSettings {
      dateFormat
      description
      language
      startOfWeek
      timeFormat
      timezone
      title
      url
    }
  }
`;


export default function MyLayout({ children }) {
  return (
    <>
<Header />
          {children}
    </>
  )
}

