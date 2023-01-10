import axios from 'axios';
import { useEffect } from "react";
import { useState } from "react";

function Edit({setLastUpdate, editMushroom, setEditMushroom}) {


    const [title, setTitle] = useState('');
    const [color, setColor] = useState('#00FF00');
    const [weight, setWeight] = useState('0');

    useEffect(() => {
        if (null === editMushroom) {
            return;
        } 
        setTitle(editMushroom.title);
        setColor(editMushroom.color);
        setWeight(editMushroom.weight);

    }, [editMushroom])

    const edit = () => {
        const mushroom = {
            title,
            color,
            weight: parseInt(weight)
        }
        axios.put('http://front.lt/api/grybai/update/' + editMushroom.id, mushroom)
        .then(() => {
            setLastUpdate(Date.now());
            setEditMushroom(null);
        })
    }


    if (editMushroom == null) {
        return null;
    }

    return (
        <>
            <h2>Redaguoti Grybas</h2>
            <div>Pavadinimas <input type="text" value={title} onChange={e => setTitle(e.target.value)} /></div>
            <div>Spalva <input type="color" value={color} onChange={e => setColor(e.target.value)} /></div>
            <div>Svoris gramais <input type="weight" value={weight} onChange={e => setWeight(e.target.value)} /></div>
            <div><button onClick={edit}>OK</button></div>
        </>
    )

}

export default Edit;