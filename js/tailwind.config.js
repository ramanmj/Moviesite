tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#060623',
            orange:'#f2994B',
            gold:'#f2bb4e',
            blue:'#62a5f4',
            // dark:'#090525',
            dark:'#00031a',

            error: 'red',
            liblack:'#808080',
            gray: {
            	100:  '#f8f8f8',
            	200: '#d1d5db',
              300:'#525967'
            }
          }
        },
         variants: {
bgcolor: ['responsive', 'hover', 'focus', 'group-hover'],
 },
      }
    }