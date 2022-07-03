import React from 'react';
import Footer from '../Footer';
import Header from '../Header';
import { Container } from './styles';

function Layout() {
  return(
    <Container>
      <Header />
      <Footer />
    </Container>
  )
}

export default Layout;