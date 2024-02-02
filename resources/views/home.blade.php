@php
    use App\Models\Lead;
    $leads = Lead::all();
@endphp

@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-warning alert-success fade show position-fixed" role="alert" style="top:20px;z-index: 6; right: 20px">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Modal de Mensagem Completa -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Mensagem Completa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aqui será exibida a mensagem completa -->
                    <p id="fullMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 w-100">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Mensagem</th>
                                <th scope="col">Data</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($leads as $lead)
                                <tr class="text-center align-middle">
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->state }}</td>
                                    <td>{{ $lead->city }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($lead->message, 50) }}
                                        @if (strlen($lead->message) > 50)
                                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#messageModal" onclick="showFullMessage('{{ $lead->message }}')">Ver mais</button>
                                        @endif
                                    </td>
                                    <td>{{ $lead->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <!-- Botão para excluir -->
                                        <button type="button" class="btn btn-danger" onclick="openDeleteLeadModal({{ $lead->id }})"><i class="bi bi-trash"></i></button>

                                        <!-- Botão para editar -->
                                        <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação para Exclusão -->
    <div class="modal fade" id="deleteLeadModal" tabindex="-1" aria-labelledby="deleteLeadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLeadModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este lead?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteLeadForm" method="POST" action="">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para exibir a mensagem completa no modal -->
    <script>

        // Função para configurar o formulário de exclusão do lead
        function setupDeleteLeadModal(id) {
            var deleteForm = document.getElementById('deleteLeadForm');
            deleteForm.action = '/leads/' + id; // Defina a ação do formulário para o caminho de exclusão do lead
        }

        // Função para abrir o modal de exclusão do lead
        function openDeleteLeadModal(id) {
            setupDeleteLeadModal(id);
            var deleteLeadModal = new bootstrap.Modal(document.getElementById('deleteLeadModal'));
            deleteLeadModal.show();
        }
    </script>
@endsection
