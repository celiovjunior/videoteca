import React from 'react';
import Footer from '../Footer';
import Header from '../Header';
import VideoList from '../VideoList';
import { Container } from './styles';

function Layout() {
  return(
    <Container>
      <Header />
      <VideoList />
      <Footer />
    </Container>
  )
}

export default Layout;