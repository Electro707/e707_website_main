
avr_loop1.o:     file format elf32-avr


Disassembly of section .text:

0000008a <doLoopFor>:
  8a: push r14
  8c: push r15
  8e: push r16
  90: push r17

00000092 <.LBB9>:
  92: mov r14, r22
  94: mov r15, r1
  96: cp r22, r1
  98: breq .+16      ; 0xaa <.L2>

0000009a <.Loc.7>:
  9a: ldi r16, 0x00 ; 0
  9c: ldi r17, 0x00 ; 0

0000009e <.L4>:
  9e: rcall .-38      ; 0x7a <doSomething>

000000a0 <.LVL3>:
  a0: subi r16, 0xFF ; 255
  a2: sbci r17, 0xFF ; 255

000000a4 <.Loc.10>:
  a4: cp r16, r14
  a6: cpc r17, r15
  a8: brne .-12      ; 0x9e <.L4>

000000aa <.L2>:
  aa: pop r17
  ac: pop r16
  ae: pop r15
  b0: pop r14

000000b2 <.Loc.13>:
  b2: ret
