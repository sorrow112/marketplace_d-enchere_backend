
import ReactDOM from 'react-dom';
import Base from './components/Base.js';
import React from 'react'
import Test from './components/Test.js';
import { createTheme, ThemeProvider  } from '@mui/material/styles';
import Button from '@mui/material/Button';

const theme = createTheme({
  palette: {
    primary: {
      main: '#362B48',
      dark: '#362B48',
      light: '#FCF8FF'
    },
    secondary: {
      main: '#FCF8FF',
      dark: '#FCF8FF',
      light: '#362B48'
    },
    info: {
      main: '#5927E5',
      dark: '#5927E5',
      light: '#5927E5'
    }
  },
  components: {
    MuiLink: {
      styleOverrides: {
        root: {
          color: "black",
          marginRight: "2%", 
          marginLeft: "2%",
          minWidth:65
        },
      },
    },
    MuiAppBar:{
      styleOverrides: {
        root: {
          backgroundColor:"#FCF8FF"
        }
      }
    }
  },

})

const App = () => {
  return (
    <ThemeProvider theme={theme}> 
    <Base />
    </ThemeProvider>
  )
}

export default App

ReactDOM.render(<App />, document.getElementById('root'));

