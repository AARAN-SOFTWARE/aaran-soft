<style>
    table, th, td {
        border: 1.5px solid #00cccc;
        border-collapse: collapse;
        border-radius: 5px;
    }

    table {
        width: 80%;
        margin: auto;
    }

    th {
        text-align: left;
        padding: 10px 20px;
    }

    td {
        text-align: left;
        font-size: 16px;
        color: dimgray;
        padding: 10px 20px;
    }
</style>
<div>
    <x-slot name="header">Factor</x-slot>
    <x-forms.m-panel>
        <div class="h-screen flex-col flex justify-evenly items-center">
            <div class="w-[80%] mx-auto text-4xl font-asul">Buttons</div>
            <div class="w-[80%] mx-auto text-md tracking-wider font-roboto py-2"><span>Various types of buttons. Using the base class
            btn-size button-name (i.e., btn-sm success)</span></div>
            <table>
                <tr>
                    <th>Primary</th>
                    <th>Secondary</th>
                    <th>Succcess</th>
                    <th>Danger</th>
                    <th>Info</th>
                </tr>
                <tr>
                    <td>btn-xs</td>
                    <td>btn-sm</td>
                    <td>btn-md</td>
                    <td>btn-lg</td>
                    <td>btn-xl</td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs primary">Primary</div>
                    </td>
                    <td>
                        <div class="btn-sm primary">Primary</div>
                    </td>
                    <td>
                        <div class="btn-md primary">Primary</div>
                    </td>
                    <td>
                        <div class="btn-lg primary">Primary</div>
                    </td>
                    <td>
                        <div class="btn-xl primary">Primary</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs secondary">Secondary</div>
                    </td>
                    <td>
                        <div class="btn-sm secondary">Secondary</div>
                    </td>
                    <td>
                        <div class="btn-md secondary">Secondary</div>
                    </td>
                    <td>
                        <div class="btn-lg secondary">Secondary</div>
                    </td>
                    <td>
                        <div class="btn-xl secondary">Secondary</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs success">Success</div>
                    </td>
                    <td>
                        <div class="btn-sm success">Success</div>
                    </td>
                    <td>
                        <div class="btn-md success">Success</div>
                    </td>
                    <td>
                        <div class="btn-lg success">Success</div>
                    </td>
                    <td>
                        <div class="btn-xl success">Success</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs danger">Danger</div>
                    </td>
                    <td>
                        <div class="btn-sm danger">Danger</div>
                    </td>
                    <td>
                        <div class="btn-md danger">Danger</div>
                    </td>
                    <td>
                        <div class="btn-lg danger">Danger</div>
                    </td>
                    <td>
                        <div class="btn-xl danger">Danger</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs info">Info</div>
                    </td>
                    <td>
                        <div class="btn-sm info">Info</div>
                    </td>
                    <td>
                        <div class="btn-md info">Info</div>
                    </td>
                    <td>
                        <div class="btn-lg info">Info</div>
                    </td>
                    <td>
                        <div class="btn-xl info">Info</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs warning">Warning</div>
                    </td>
                    <td>
                        <div class="btn-sm warning">Warning</div>
                    </td>
                    <td>
                        <div class="btn-md warning">Warning</div>
                    </td>
                    <td>
                        <div class="btn-lg warning">Warning</div>
                    </td>
                    <td>
                        <div class="btn-xl warning">Warning</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs light">Light</div>
                    </td>
                    <td>
                        <div class="btn-sm light">Light</div>
                    </td>
                    <td>
                        <div class="btn-md light">Light</div>
                    </td>
                    <td>
                        <div class="btn-lg light">Light</div>
                    </td>
                    <td>
                        <div class="btn-xl light">Light</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn-xs dark">Dark</div>
                    </td>
                    <td>
                        <div class="btn-sm dark">Dark</div>
                    </td>
                    <td>
                        <div class="btn-md dark">Dark</div>
                    </td>
                    <td>
                        <div class="btn-lg dark">Dark</div>
                    </td>
                    <td>
                        <div class="btn-xl dark">Dark</div>
                    </td>
                </tr>
            </table>
        </div>
    </x-forms.m-panel>
</div>


