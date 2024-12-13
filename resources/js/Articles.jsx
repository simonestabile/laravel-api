import React, {useEffect, useState} from "react";

import axios from "axios";

export default function Articles() {
    const [items, setItems] = useState([]);

    useEffect(() => {
        axios.get('/api/articles').then(response => setItems(response.data))
    }, [])

    return (<ul>
        {items.map(item => {
            return <li>{item.title}</li>
        })}
        </ul>
    )
}