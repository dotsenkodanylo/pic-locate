import createDataContext from './createDataContext';
import AsyncStorage from '@react-native-async-storage/async-storage';
import api from '../api/api';

const authReducer = (state, action) => {
   switch (action.type) {
      case 'TEST_LOAD_TOKEN':
         return {
            ...state,
            token: 'asdf'
         };

      case 'TEST_OFFLOAD_TOKEN':
         return {
            ...state,
            token: null
         };


      case 'LOGIN':
         return {
            ...state,
            token: action.payload,
            errorMessage: null,
         }

      case 'LOGOUT':
         return {
            ...state,
            token: null,
            errorMessage: null,
         }

      case 'CLEAR_ERROR_MESSAGE':
         return {
            ...state,
            errorMessage: null,
         }

      case 'SET_ERROR_MESSAGE':
         return {
            ...state,
            errorMessage: action.payload,
         }

      case 'RESOLVE_AUTH_TOKEN':
         return {
            ...state,
            token: action.payload,
            errorMessage: action.payload,
            isLoading: false
         }

      case 'UNSET_LOADING':

      default:
         return state;
   }
};

const login = (dispatch) => {
   return async ({ email, password }) => {
      try {
         const deviceName = await DeviceInfo.getDeviceName();
         const response = await api.post('/login', {
            email,
            password,
            deviceName
         });

         await AsyncStorage.setItem('token', response.data.token);
         dispatch({ type: 'LOGIN', payload: response.data.token });

      } catch (e) {
         dispatch({ type: 'SET_ERROR_MESSAGE', payload: 'Something went wrong with logging in.' });
      }
   };
};

const logout = (dispatch) => {
   return async () => {
      try {
         await api.post('/logout');

         await AsyncStorage.removeItem('token');
         dispatch({ type: 'LOGOUT' });

      } catch (e) {
         dispatch({ type: 'SET_ERROR_MESSAGE', payload: 'Something went wrong with logging out.' });
      }
   };
};

const resolveAuthToken = (dispatch) => {
   return async () => {
      try {
         const token = await AsyncStorage.getItem('token');
         dispatch({ type: 'RESOLVE_AUTH_TOKEN', payload: token });
      } catch (error) {
         console.log(error);
      }
   };
}

const loadToken = (dispatch) => {
   return async () => {
      dispatch({ type: 'TEST_LOAD_TOKEN' });
   };
}

const offloadToken = (dispatch) => {
   return async () => {
      dispatch({ type: 'TEST_OFFLOAD_TOKEN' });
   };
}

export const { Provider, Context } = createDataContext(
   authReducer,
   { login, logout, resolveAuthToken, loadToken, offloadToken },
   {
      token: null,
      isLoading: true,
      errorMessage: null
   }
);

