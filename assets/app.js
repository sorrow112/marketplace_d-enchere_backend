
import ReactDOM from 'react-dom';
import Base from './components/Base.js';
import React from 'react'
import { createTheme, ThemeProvider  } from '@mui/material/styles';
import { createStore } from 'redux';
import myReducers from './reducers/index.js';
import { Provider } from 'react-redux';

const store = createStore(myReducers, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());

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
    },
    

}});

const App = () => {
  return (
    <ThemeProvider theme={theme}> 
    <Base />
    </ThemeProvider>
  )
}

export default App

ReactDOM.render(
  <Provider store={store}>
<App />
</Provider>
, document.getElementById('root'));

