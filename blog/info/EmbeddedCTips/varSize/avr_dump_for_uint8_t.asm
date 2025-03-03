
avr_loop1.o:     file format elf32-avr


Disassembly of section .text:

0000008a <doLoopFor>:
  8a: push r16
  8c: push r17
  8e: mov r16, r22

00000090 <.LBB9>:
  90: cp r22, r1
  92: breq .+10      ; 0x9e <.L2>

00000094 <.Loc.7>:
  94: ldi r17, 0x00 ; 0

00000096 <.L4>:
  96: rcall .-30      ; 0x7a <doSomething>

00000098 <.LVL3>:
  98: subi r17, 0xFF ; 255

0000009a <.Loc.10>:
  9a: cpse r16, r17
  9c: rjmp .-8       ; 0x96 <.L4>

0000009e <.L2>:
  9e: pop r17
  a0: pop r16

000000a2 <.Loc.13>:
  a2: ret
