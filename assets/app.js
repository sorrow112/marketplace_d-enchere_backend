
import ReactDOM from 'react-dom';
import Base from './components/base/Base.js';
import React from 'react'
import { createTheme, ThemeProvider  } from '@mui/material/styles';
import { createStore } from 'redux';
import myReducers from './redux/reducers/index.js';
import { Provider } from 'react-redux';
import "./styles/app.css";

const store = createStore(myReducers, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());

const theme = createTheme({
  palette: {
    primary: {
      main: '#FCF8FF',
      dark: '#362B48',
      light: '#FCF8FF'
    },
    secondary: {
      main: '#362B48',
      dark: '#FCF8FF',
      light: '#362B48'
    },
    info: {
      main: '#5927E5',
      dark: '#5927E5',
      light: '#5927E5'
    }
  },
});

const darkTheme = createTheme(  {components: {
  MuiLink: {
    styleOverrides: {
      root: {
        marginRight: "2%", 
        marginLeft: "2%",
        minWidth:65,
      },
    },
  },
  

}})



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

