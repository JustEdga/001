import { useState } from 'react';
import { useEffect } from 'react';
import './App.css';
import List from './Components/List';
import axios from 'axios';
import Create from './Components/Create';
import Edit from './Components/Edit'

function App() {

  const [mushrooms, setMushrooms] = useState([]);
  const [lastUpdate, setLastUpdate] = useState(Date.now());
  const [editMushroom, setEditMushroom] = useState(null);


  useEffect(() => {
    axios.get('http://front.lt/api/grybai')
    .then(res => {
      setMushrooms(res.data.grybai);
    })
  }, [lastUpdate]);



  return (
    <>
    <style></style>
    <Create setLastUpdate={setLastUpdate} />
    <Edit setEditMushroom={setEditMushroom} editMushroom={editMushroom} setLastUpdate={setLastUpdate} />
    <List mushrooms={mushrooms} setEditMushroom={setEditMushroom} setLastUpdate={setLastUpdate} />
    </>
  );
}

export default App;
