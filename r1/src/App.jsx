import './App.scss';

import {BooksProvider} from './Components/BooksContext';
import Layout from './Components/Layout';

export default function Books() {
  return (
    <BooksProvider>
    <div className="App">
      <div className = "bin">
       <Layout>

       </Layout>
      </div>
    </div>
    </BooksProvider>
  );
}
 