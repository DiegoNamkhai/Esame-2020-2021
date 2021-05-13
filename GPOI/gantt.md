```MERMAID
gantt
    title GANTT
    axisFormat  %d-%m
    todayMarker stroke:#0,stroke-width:0px
    section Avvio
    1.0 :10, 2021-05-04, 12h
    1.1 :11, after 10  , 12h
    1.2 :12, after 11, 12h
    1.3 :13, after 12, 12h

    section Progettazione
    2.0:20, after 13, 36h
    2.1:21, after 20, 12h
    2.2:22, after 21, 3d
    2.3:23, after 21, 1d
    2.4:24, after 23, 1d

    section Implementazione
    3.0:30, after 21, 12h
    3.1:31, after 30, 12h
    3.2:32, after 21, 13d
    3.3:33, after 22, 12d
    3.4:34, 2021-05-17, 10d

    section Collaudo
    4.0:40, after 33, 3d
    4.1:41, after 32, 6d
    4.2:42, after 34, 2d

```


